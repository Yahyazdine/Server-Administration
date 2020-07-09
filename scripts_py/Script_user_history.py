from netmiko import ConnectHandler
import sqlite3
import re


def history_user(server, host, username, password):
    history = [server]
    VM = {'device_type': 'linux', 'host': host,
          'username': username, 'password': password}
    net_connect = ConnectHandler(**VM)
    output = net_connect.send_command("last | grep -v 'reboot' | sed 's/\ \ */\ /g' | cut -f1,3-7,9-10 -d ' ' | head -n -1")
    output = re.split(r'[\n\s]\s*', output)
    history.append(output)
    return history


#####Insertion dans la base des données
conn = sqlite3.connect('Servers')
c = conn.cursor()
t = c.execute("SELECT serveur_name,user_ip,username,password,state FROM info_server")
tableau = t.fetchall()
ser = []
for x in tableau:
    if x[4] == 'down':
        ser.append([x[0], ['-', '-', '-', '-', '-', '-']])
    else:
        ser.append(history_user(x[0], x[1], x[2], x[3]))

c.execute(" DROP TABLE  IF EXISTS info_history")
c.execute("""CREATE TABLE IF NOT EXISTS info_history(
          servers_name VARCHAR(20),
          users_name VARCHAR(30),
          add_source VARCHAR(30),
          day_connection VARCHAR(30),
          month_connection  VARCHAR(30),
          day_of_month_connection  VARCHAR(30),
          begin_connection VARCHAR(30),
          end_disconnection VARCHAR (30),
          duration_connection VARCHAR(30)
          )
          """)
for x in ser:
    for i in range(0, len(x[1]) - 8, 8):
        if x [1] [i + 6]=='logged' and x[1][i + 7]=='in':
            c.execute(
                'INSERT INTO info_history(servers_name ,users_name,add_source,day_connection,'
                'month_connection,day_of_month_connection,begin_connection,end_disconnection,duration_connection )'
                ' VALUES(?,?,?,?,?,?,?,?,?)',
                (x [0],x [1] [i],x [1] [i + 1],x [1] [i + 2],x [1] [i + 3],x [1] [i + 4],x [1] [i + 5],'still logged in',
                 '-') )
        else:
            c.execute(
             'INSERT INTO info_history(servers_name ,users_name,add_source,day_connection,'
             'month_connection,day_of_month_connection,begin_connection,end_disconnection,duration_connection )'
             ' VALUES(?,?,?,?,?,?,?,?,?)',
             (x[0], x[1][i], x[1][i + 1], x[1][i + 2],
              x[1][i + 3], x[1][i + 4], x[1][i + 5],
              x[1][i + 6],x[1][i + 7][1:6]))

conn.commit()
conn.close()