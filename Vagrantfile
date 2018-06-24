
ENV['VAGRANT_DEFAULT_PROVIDER'] = 'docker'
ENV['VAGRANT_NO_PARALLEL'] = 'yes'
 
Vagrant.configure("2") do |config|


  config.vm.define "mysql-container",autostart: false  do |m|
 
   m.vm.provider :docker do |d|
    
   
    d.build_dir = "dockerfile_mysql"
#  NEXT LINE IS IMPORTANT to avoid docker not in PATH errors
    d.force_host_vm = true
    d.has_ssh = true
    d.name = 'mysql-container'
    d.vagrant_machine = "dockerhostvm5"
    d.vagrant_vagrantfile = "./DockerHostVagrantfile"
    d.remains_running = true
	#d.create_args = ["-e" "MYSQL_ALLOW_EMPTY_PASSWORD=yes" "-e" "MYSQL_USER=john" "-e" "MYSQL_PASSWORD=password" "-e" "MYSQL_DATABASE=mydatabase"]
	
	d.create_args = ["-e", "MYSQL_ALLOW_EMPTY_PASSWORD=yes", "-e", "MYSQL_USER=john", "-e", "MYSQL_PASSWORD=password", "-e", "MYSQL_DATABASE=mydatabase"]
	

	d.volumes = ["/host_data/:/home/dock_host_data", "/host_sql_data/:/var/lib/mysql"] 
   d.cmd = ["mysqld", "--user=mysql"] 
   
   end
 end



 config.vm.define "php-container" ,autostart: false do |m|
 
   m.vm.provider :docker do |d|
    d.build_dir = "dockerfile_php"
#  NEXT LINE IS IMPORTANT to avoid docker not in PATH errors
    d.force_host_vm = true
    d.has_ssh = true
    d.name = 'php-container'
    d.vagrant_machine = "dockerhostvm5"
    d.vagrant_vagrantfile = "./DockerHostVagrantfile"
    d.remains_running = true
    # d.link("apache-alpine-container:my-friend")
	################3
	d.link("mysql-container:db")
	# d.volumes = ["/host_web/:/usr/local/apache2b/htdocs"] 
	d.volumes = ["/host_web/:/var/www/html"] 
    # d.create_args = ["--volumes-from=apache-alpine-container"]
   end
 end
 


 
 
  config.vm.define "apache-container",autostart: false  do |m|
 
     m.vm.provider :docker  do |d|
      # d.volumes = ["/host_data/:/dock_host_data"] 
	    d.volumes = ["/host_web/:/usr/local/apache2/htdocs"] 
	  #d.create_args = ["--volumes-from=php-container"]

#  NEXT LINE IS IMPORTANT to avoid docker not in PATH errors
      d.force_host_vm = true
      d.name = 'apache-container'
      d.has_ssh = true
      d.build_dir = "dockerfile_apache"
      #d.cmd = ["ping", "-c 55", "127.0.0.1"]
	  #d.cmd = ["ping", "-c 51", "127.0.0.1"]
      d.remains_running = true
      d.vagrant_machine = "dockerhostvm5"
      d.vagrant_vagrantfile = "./DockerHostVagrantfile"
	  d.link("mysql-container:db")
	  d.link("php-container:php")

      # d.cmd = ["/usr/sbin/apache2ctl","-D", "FOREGROUND"]
	  #
	  # d.cmd = ["rc-service", "apache2", "start"]
	  # d.cmd = ["/etc/init.d/", "apache2", "start"]
	  # d.cmd = ["/usr/sbin/httpd", "-DFOREGROUND"]
	  # d.cmd = ["/usr/local/apache2/bin/httpd", "-DFOREGROUND", "-f  /usr/local/apache2/conf/httpd.conf"]
	
	  # d.cmd = ["bash"]
      d.ports = ["8080:80"]
     end
    end

	
	  config.vm.define "adminer-container",autostart: false  do |m|
 
     m.vm.provider :docker  do |d|
      # d.volumes = ["/host_data/:/dock_host_data"] 
	    d.volumes = ["/host_web/:/usr/local/apache2/htdocs"] 
	  #d.create_args = ["--volumes-from=php-container"]

#  NEXT LINE IS IMPORTANT to avoid docker not in PATH errors
      d.force_host_vm = true
      d.name = 'adminer-container'
      d.has_ssh = true
      d.build_dir = "dockerfile_adminer"
      #d.cmd = ["ping", "-c 55", "127.0.0.1"]
	  #d.cmd = ["ping", "-c 51", "127.0.0.1"]
      d.remains_running = true
      d.vagrant_machine = "dockerhostvm5"
      d.vagrant_vagrantfile = "./DockerHostVagrantfile"
	  d.link("mysql-container:db")
	  d.link("php-container:php")

      # d.cmd = ["/usr/sbin/apache2ctl","-D", "FOREGROUND"]
	  #
	  # d.cmd = ["rc-service", "apache2", "start"]
	  # d.cmd = ["/etc/init.d/", "apache2", "start"]
	  # d.cmd = ["/usr/sbin/httpd", "-DFOREGROUND"]
	  # d.cmd = ["/usr/local/apache2/bin/httpd", "-DFOREGROUND", "-f  /usr/local/apache2/conf/httpd.conf"]
	
	  # d.cmd = ["bash"]
      d.ports = ["8083:8080"]
     end
    end





end