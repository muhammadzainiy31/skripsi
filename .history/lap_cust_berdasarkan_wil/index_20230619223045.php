SELECT rute, COUNT(*) AS total_pengiriman
FROM pengiriman
GROUP BY rute;
