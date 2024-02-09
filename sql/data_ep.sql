use evPoc;
SELECT * FROM data_ep;

describe data_ep;

-- the newest
select created from data_ep where users_id = '1' and created = (SELECT MAX(created) FROM data_ep);

-- today
select * from data_ep where users_id = '1' and cur_date = curdate();

-- month
select * from data_ep where cur_month = (SELECT MONTH(CURRENT_DATE()));

-- week
select * from data_ep where cur_week = (week(current_date()) +1);

-- yesterday
select * from data_ep where cur_day = (select day(current_date()));

delete from data_ep where data_id = 30;

select * from data_ep where temp_in != -1000;

select cur_time, cur_date from data_ep where users_id = '2' and cur_time = (SELECT MAX(cur_time) FROM data_ep) and cur_date = (SELECT MAX(cur_date) FROM data_ep);

select cur_date from data_ep where temp_in != -1000 and cur_date = (SELECT MAX(cur_date) FROM data_ep);

-- select cur_date, cur_time from data_ep where temp_in != -1000 and cur_date = (SELECT MAX(cur_date) FROM data_ep) and data_id = (SELECT MAX(data_id) FROM data_ep);

select max(cur_time) as timeNumber from data_ep where users_id = '2' and temp_in != -1000 and cur_date = (select max(cur_date) from data_ep);
select temp_in from data_ep where users_id = '2' and temp_in != -1000 and data_id = (select max(data_id) from data_ep);
select temp_out from data_ep where users_id = '2' and data_id = (select max(data_id) from data_ep where temp_out != -1000);
select cur_date, cur_time from data_ep where data_id = (select max(data_id) from data_ep where temp_out != -1000);
select cur_date, cur_time from data_ep where data_id = (select max(data_id) from data_ep);
select rainfall from data_ep where users_id = '2' and data_id = (select max(data_id) from data_ep);

delete from data_ep where users_id = '2' and data_id = '49' limit 1;
DELETE from data_ep WHERE data_id = (select max(data_id) from data_ep) ;

select max(data_id) from data_ep limit 1;
SELECT MAX(data_id) FROM data_ep;