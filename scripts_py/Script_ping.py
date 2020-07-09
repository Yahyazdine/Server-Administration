### Exécution chaque qlq secondes afin de changer l'état des serveurs (down or up) dans la table 'info_server'
import os
import sqlite3
conn=sqlite3.connect( 'Servers' )
c=conn.cursor()
t=c.execute("SELECT user_ip,state FROM info_server")
tableau=t.fetchall()
for x in tableau :
  ip=x[0]
  if __name__ == '__main__':
    response=os.popen( f"ping {ip}" ).read()
    if response.count( 'TTL' ) == 4:
      new_state='up'
    else:
      new_state='down'
  if x[1]!=new_state:
    c.execute( ' UPDATE info_server SET state=? where user_ip=?',(new_state,x[0]))

conn.commit()
conn.close()
