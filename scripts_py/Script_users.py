from netmiko import ConnectHandler
import sqlite3


def state_user( server,host,username,password ):
    nonconnected_user=[]
    connected=[server]
    nonconnected=[server]
    VM={'device_type': 'linux','host': host,
        'username': username,'password': password}
    net_connect=ConnectHandler( **VM )
    output=net_connect.send_command( "users" )
    output=list( set( output.split( " " ) ) )
    connected.append( output )
    output1=net_connect.send_command( "grep bash /etc/passwd | cut -f1 -d:" )
    output_user=list( set( output1.split( "\n" ) ) )
    for i in range( len( output_user ) ):
        if output_user [i] not in connected [1]:
            nonconnected_user.append( output_user [i] )
    nonconnected.append( nonconnected_user )
    return connected,nonconnected


#####Insertion dans la base des données
conn=sqlite3.connect( 'Servers' )
c=conn.cursor()
t=c.execute( "SELECT serveur_name,user_ip,username,password,state FROM info_server" )
tableau=t.fetchall()
c.execute( " DROP TABLE  IF EXISTS info_user" )
c.execute( """CREATE TABLE IF NOT EXISTS info_user(
          servers_name VARCHAR(20),
          users_name VARCHAR(30),
          users_state VARCHAR(30))
          """ )
for x in tableau:
    if x [4] == 'down':
        c.execute( 'INSERT INTO info_user(servers_name,users_name,users_state)'
                   ' VALUES(?,?,?)',
                   (x [0],'-','-') )

    else:
        ser=state_user( x [0],x [1],x [2],x [3] )
        connected=ser[0]
        nonconnected=ser[1]
        for i in range( len( connected [1] ) ):
                     c.execute( 'INSERT INTO info_user(servers_name ,users_name,users_state)'
                       ' VALUES(?,?,?)',
                       (connected [0],connected [1] [i],'connected') )
        for i in range( len( nonconnected [1] ) ):
                  c.execute( 'INSERT INTO info_user(servers_name ,users_name,users_state)'
                   ' VALUES(?,?,?)',
                   (nonconnected [0],nonconnected [1] [i],'disconnected') )
conn.commit()
conn.close()