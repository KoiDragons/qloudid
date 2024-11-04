#!/usr/bin/env python
import sys
import os
import bankid
import json

cert_and_key = ['/mnt/persist/www/docroot_qloudid/public_html/ext/bankid/qloudid_cert/cert.pem', '/mnt/persist/www/docroot_qloudid/public_html/ext/bankid/qloudid_cert/server.key']
#cert_and_key = ['/mnt/persist/www/docroot_qloudid/public_html/ext/bankid/qloudid_cert/testcer/certificate.pem', '/mnt/persist/www/docroot_qloudid/public_html/ext/bankid/qloudid_cert/testcer/key.pem']

end_user_ip = sys.argv[1]
personal_number = sys.argv[2]

try:
	client = bankid.BankIDJSONClient(certificates=cert_and_key, test_server=False)
	response = client.authenticate(end_user_ip=end_user_ip, personal_number=personal_number)
	print(json.dumps(response))
except Exception, e:
	print(json.dumps({'error_message': e.message}))




#print "{personal_num:"+personal_number+", message: "+message+"}"
#sftp://root@172.104.153.19/mnt/persist/www/docroot_qloudid/public_html/ext/bankid/qloudid_cert/server.key