SELECT 
fb_web,
fb_cover,
fb_about,
fb_culinary_team,
fb_description,
fb_name,
fb_date,
fb_lat,
fb_lng,
fb_city,
fb_state,
fb_street,
fb_zip,
fb_talking_about,
fb_were_here,
fb_likes,
TRUNCATE((SQRT(POW(69.1 * (fb_lat - $latitude),2) + POW(69.1 *( $longitude - fb_lng) * COS(fb_lat/57.3), 2)) * 0.621371),2)
AS distance 
FROM top10_markers 
WHERE fb_date = CURDATE() 
HAVING distance < 10
ORDER BY fb_talking_about DESC LIMIT 10;

SELECT 
fs_name,  
fs_phone,
fs_menu,
fs_mobile_menu,
fs_reservations,
fs_checkins,
fs_users,
fs_tips,
TRUNCATE((SQRT ( POW ( 69.1 * ( fs_lat - $latitude ), 2 ) + POW ( 69.1 * ( $longitude - fs_lng ) * COS ( fs_lat/ 57.3 ), 2 ) ) * 0.621371),2)
AS distance 
FROM foursquare 
WHERE fs_date=CURDATE()
HAVING distance < 10
ORDER BY fs_checkins DESC LIMIT $limit





#Combined query that works
SELECT
fb_web,
fb_cover,
fb_about,
fb_culinary_team,
fb_description,
fb_name,
fb_date,
fb_lat,
fb_lng,
fs_lat,
fs_lng,
fb_city,
fb_state,
fb_street,
fb_zip,
fb_talking_about,
fb_were_here,
fb_likes,
fs_name,  
fs_phone,
fs_menu,
fs_mobile_menu,
fs_reservations,
fs_checkins,
fs_users,
fs_tips,
TRUNCATE((fb_talking_about * 0.5) + (((fs_users + fs_checkins + fb_were_here + fb_likes)/4) * 0.5), 0) AS heatery_score,
TRUNCATE(fb_lat,3) AS fb_lat, 
TRUNCATE (fs_lat,3) AS fs_lat,
TRUNCATE (fs_lng,3) AS fs_lng,
TRUNCATE (fb_lng,3) AS fb_lng,
TRUNCATE((SQRT(POW(69.1 * (fb_lat - 34.723509),2) + POW(69.1 *( -76.737723 - fb_lng) * COS(fb_lat/57.3), 2)) * 0.621371),2)
AS fb_distance
FROM top10_markers
INNER JOIN foursquare
WHERE  fs_name LIKE fb_name AND 
fb_date = curdate() AND fs_date = curdate()
HAVING fb_distance < 10 
ORDER BY heatery_score DESC LIMIT 10;