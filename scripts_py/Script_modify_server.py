import sqlite3
import sys
def modify_serveur(servername,new_name):
    conn = sqlite3.connect('Servers')
    c = conn.cursor()
    c.execute("UPDATE info_server SET serveur_name=? WHERE serveur_name = ?", (str(new_name),str(servername)))
    conn.commit()
    conn.close()
    return
modify_serveur(sys.argv[1],sys.argv[2])