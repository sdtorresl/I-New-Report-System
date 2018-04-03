SELECT '2018-03-20'::date as start_date,
		'2018-03-21'::date as end_date,  
		oldmsisdn AS old_msisdn, 
        newmsisdn AS new_msisdn,
        (tickettimestamp + interval '0 hour')::date AS date,
		(CASE WHEN operation  in ('PortIn')
	 	 THEN 'Port-In' 
	 	 WHEN operation in ('PortOut')
		 THEN 'Port-Out' 
		 ELSE operation END) AS operation,
        (CASE WHEN operation  in ('PortIn','PortInSuccessful') THEN 
         donorcarrier
         WHEN operation in ('PortOut','PortOutSuccessful') THEN
	 	 recipientcarrier END) AS carrier,
        (CASE WHEN resultcode = 'OK' THEN ''
        ELSE resultcode END) AS error
FROM 
		prov_sdr
WHERE 
		tickettimestamp >= ('2018-03-20'::date - interval '0 hour')::timestamp AND
		tickettimestamp <  ('2018-03-21'::date - interval '0 hour')::timestamp AND
		providerid = 1 AND		
	 	(resultcode IN ('OK','FAILED', 'CANCELED') OR
	 	 resultcode LIKE '%Error%' OR
	  	 resultcode LIKE '%Failed%' OR
	  	 resultcode LIKE '%Expired%') AND
      	'operation'='operation' AND
      	'old-msisdn'='old-msisdn' AND
      	'new-msisdn'='new-msisdn' AND
      	'resultcode'='resultcode' AND
      	operation LIKE 'PortIn'
ORDER BY date, operation, error;