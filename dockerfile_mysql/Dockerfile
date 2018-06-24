# FROM mysql-server:5.5.60
 FROM mysql:8.0.0
 COPY /startup.sh /docker-entrypoint-initdb.d
 RUN chown -R mysql:root /var/lib/mysql/
 #RUN apt-get update
 #RUN apt-get install -y vim
 EXPOSE 3306
 

 
 
 


