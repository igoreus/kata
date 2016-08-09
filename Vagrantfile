# -*- mode: ruby -*-
# vi: set ft=ruby :

VAGRANTFILE_API_VERSION = "2"

Vagrant.configure(VAGRANTFILE_API_VERSION) do |config|
    config.vm.box = "ubuntu/trusty64"
    config.vm.hostname = "igoreus.kata"
    config.vm.network :private_network, ip: "192.168.56.105"
    config.vm.provision :shell, path: "VagrantBox/scripts/setup.sh", run: "once"
    config.vm.provision :shell, path: "VagrantBox/scripts/run.sh", run: "always"
    config.vm.synced_folder ".", "/vagrant", type: "nfs", nfs_udp: false
    config.vm.synced_folder ".", "/kata", type: "nfs", nfs_udp: false
    config.vm.provider "virtualbox" do |v|
        v.name = "kata"
        v.memory = 2048
        v.cpus = 2
    end
    config.ssh.forward_agent = true
end
