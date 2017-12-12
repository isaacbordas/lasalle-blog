# -*- mode: ruby -*-
# vi: set ft=ruby :

Vagrant.configure("2") do |config|
  config.vm.box = "ubuntu/xenial64"

  # config.vm.network "private_network", ip: "192.168.70.177"

  config.vm.synced_folder "web", "/var/www/html"

  config.vm.provision "shell", inline: <<-SHELL
    export DEBIAN_FRONTEND=noninteractive
    echo "Updating source list" | tee /home/ubuntu/vm_build.log
    apt-get update >> /home/ubuntu/vm_build.log
    echo "Installing apache2" | tee /home/ubuntu/vm_build.log
    apt-get install -y apache2 >> /home/ubuntu/vm_build.log
    echo "Installing ondrej repo" | tee /home/ubuntu/vm_build.log
    apt-get install -y python-software-properties >> /home/ubuntu/vm_build.log
    add-apt-repository -y ppa:ondrej/php >> /home/ubuntu/vm_build.log
    echo "Updating source list" | tee /home/ubuntu/vm_build.log
    apt-get update -y >> /home/ubuntu/vm_build.log
    echo "Installing php7.1" | tee /home/ubuntu/vm_build.log
    apt-get install -y php7.1 libapache2-mod-php7.1 php7.1-curl php7.1-json php7.1-cli php7.1-common php7.1-mbstring php7.1-gd php7.1-intl php7.1-xml php7.1-mysql php7.1-mcrypt php7.1-zip >> /home/ubuntu/vm_build.log
    echo "Installing mysql" | tee /home/ubuntu/vm_build.log
    debconf-set-selections <<< 'mysql-server mysql-server/root_password password endeve007'
    debconf-set-selections <<< 'mysql-server mysql-server/root_password_again password endeve007'
    apt-get install -y mysql-server >> /home/ubuntu/vm_build.log
    echo "Restart apache2" | tee /home/ubuntu/vm_build.log
    service apache2 restart >> /home/ubuntu/vm_build.log
    echo "Installing composer" | tee /home/ubuntu/vm_build.log
    curl --silent https://getcomposer.org/installer | php >> /home/ubuntu/vm_build.log
    mv composer.phar /usr/local/bin/composer >> /home/ubuntu/vm_build.log
    echo "Installing git" | tee /home/ubuntu/vm_build.log
    apt-get install -y git >> /home/ubuntu/vm_build.log
  SHELL
end
