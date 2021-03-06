# See http://docs.getchef.com/config_rb_knife.html for more information on knife configuration options

current_dir = File.dirname(__FILE__)
log_level                :info
log_location             STDOUT
node_name                "jaiswalr"
client_key               "#{current_dir}/jaiswalr.pem"
validation_client_name   "ncloud-validator"
validation_key           "#{current_dir}/ncloud-validator.pem"
chef_server_url          "https://vmwchef01-ncld.corp.netapp.com/organizations/ncloud"
cache_type               'BasicFile'
cache_options( :path => "#{ENV['HOME']}/.chef/checksums" )
cookbook_path            ["#{current_dir}/../cookbooks"]
