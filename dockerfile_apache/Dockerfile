#FROM ubuntu:14.04
#FROM bento/centos-7.2
  FROM httpd:2.4.33-alpine
 


  ###############
    COPY /files/httpd.conf /usr/local/apache2/conf/httpd.conf
   # COPY /files/htdocker.conf  /usr/local/apache2/conf/extra/htdocker.conf
   # COPY /files/phpinfo.php  /usr/local/apache2/htdocs/phpinfo.php
   # COPY /files/.htaccess  /usr/local/apache2/htdocs/.htaccess
   COPY /files/htdocker.conf  /usr/local/apache2/conf/htdocker.conf
   
   
   #COPY /files/apache2_setup  /etc/services.d/apache/run
   #RUN addgroup -S johnb && adduser -S -G johnb johnb
#  try to see logs:https://github.com/smebberson/docker-alpine/tree/master/alpine-apache
    RUN ln -sf /dev/stdout /usr/local/apache2/logs/access_log && \
      ln -sf /dev/stderr /usr/local/apache2/logs/error_log   
  # RUN a2enmod deflate
  # RUN a2enmod proxy
  # RUN a2enmod proxy_http
  # RUN a2enmod proxy_fcgi
  
	

  EXPOSE 80
  # COPY /web-site/ /var/www/html/
  