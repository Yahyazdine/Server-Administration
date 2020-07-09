import os
import sys
if __name__ == '__main__':

    ip_list =[sys.argv[1],sys.argv[2]]
    for ip in ip_list :
        response= os.popen(f"ping {ip}").read()
        if response.count('TTL') == 4:
            print(ip + " server up")
        else:
            print(ip + "server down")