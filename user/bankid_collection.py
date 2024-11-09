#!/usr/bin/env python
import sys
import os
import bankid
import json
cert_and_key = ['/var/www/html/safeqloud.com/public_html/ext/bankid/safeqloud_cert/cert.pem', '/var/www/html/safeqloud.com/public_html/ext/bankid/safeqloud_cert/server.key']
#cert_and_key = ['/var/www/html/safeqloud.com/public_html/ext/bankid/safeqloud_cert/testcer/certificate.pem', '/var/www/html/safeqloud.com/public_html/ext/bankid/safeqloud_cert/testcer/key.pem']


try:
	order_ref = sys.argv[1]
        client = bankid.BankIDJSONClient(certificates=cert_and_key, test_server=True)
        response = client.collect(order_ref)
	print(json.dumps(response))
except Exception, e:
        print(json.dumps({'error_message': e.message}))
