#Returns unique values for Foursquare Data
SELECT DISTINCT fs_rest.fs_name, fs_soc.fs_tips, fs_soc.fs_checkins, fs_soc.fs_users,  fs_loc.fs_lat, fs_loc.fs_lng, fs_soc.fs_date FROM fs_rest INNER JOIN fs_soc ON fs_rest.FSID = fs_soc.FSID INNER JOIN fs_loc ON fs_rest.FSID = fs_loc.FSID

#returns unique values between all three
SELECT DISTINCT fb_name FROM top10_markers INNER JOIN health_scores, fs_combined WHERE fb_name=establishmentName AND fb_name=fs_name;

Results: [Cabana El Rey, Sazio, Park Tavern]

#returns unique values between all three
SELECT DISTINCT fb_name, fb_likes, fb_talking_about, fb_were_here, fs_tips, fs_users, fs_checkins, hdscoreRankingPercent, lastInspectionDate FROM top10_markers INNER JOIN health_scores, fs_combined WHERE fb_name=establishmentName AND fb_name=fs_name;