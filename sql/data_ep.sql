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

delete from data_ep where data_id = 8;
