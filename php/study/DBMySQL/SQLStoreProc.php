<?php
// 调用存储过程

/*
 * ======================================
 * 实例一：无参的存储过程
$conn = mysql_connect('localhost','root','root') or die ("数据连接错误!!!");
mysql_select_db('test',$conn);
$sql = "
create procedure myproce()
begin
INSERT INTO user (id, username, sex) VALUES (NULL, 's', '0');
end; 
";
mysql_query($sql);//创建一个myproce的存储过程
$sql = "call test.myproce();";
mysql_query($sql);//调用myproce的存储过程，则数据库中将增加一条新记录
 * ======================================
实例二：传入参数的存储过程
$sql = "
create procedure myproce2(in score int)
begin
if score >= 60 then
select 'pass';
else
select 'no';
end if;
end; 
";
mysql_query($sql);//创建一个myproce2的存储过程
$sql = "call test.myproce2(70);";
mysql_query($sql);//调用myproce2的存储过程,看不到效果，可以在cmd下看到结果
 * ======================================
实例三：传出参数的存储过程
$sql = "
create procedure myproce3(out score int)
begin
set score=100;
end; 
";
mysql_query($sql);//创建一个myproce3的存储过程
$sql = "call test.myproce3(@score);";
mysql_query($sql);//调用myproce3的存储过程
$result = mysql_query('select @score;');
$array = mysql_fetch_array($result);
echo '<pre>';print_r($array);
 * ======================================
实例四：传出参数的inout存储过程
$sql = "
create procedure myproce4(inout sexflag int)
begin
SELECT * FROM user WHERE sex = sexflag;
end; 
";
mysql_query($sql);//创建一个myproce4的存储过程
$sql = "set @sexflag = 1";
mysql_query($sql);//设置性别参数为1
$sql = "call test.myproce4(@sexflag);";
mysql_query($sql);//调用myproce4的存储过程,在cmd下面看效果
 * ======================================
实例五：使用变量的存储过程 
$sql = "
create procedure myproce5(in a int,in b int)
begin
declare s int default 0;
set s=a+b;
select s;
end; 
";
mysql_query($sql);//创建一个myproce5的存储过程
$sql = "call test.myproce5(4,6);";
mysql_query($sql);//调用myproce5的存储过程,在cmd下面看效果
 * ======================================
实例六：case语法
$sql = "
create procedure myproce6(in score int)
begin
case score
when 60 then select '及格';
when 80 then select '及良好';
when 100 then select '优秀';
else select '未知分数';
end case;
end; 
";
mysql_query($sql);//创建一个myproce6的存储过程
$sql = "call test.myproce6(100);";
mysql_query($sql);//调用myproce6的存储过程,在cmd下面看效果
 * ======================================
实例七：循环语句
$sql = "
create procedure myproce7()
begin
declare i int default 0;
declare j int default 0;
while i<10 do
set j=j+i;
set i=i+1;
end while;
select j;
end; 
";
mysql_query($sql);//创建一个myproce7的存储过程
$sql = "call test.myproce7();";
mysql_query($sql);//调用myproce7的存储过程,在cmd下面看效果
 * ======================================
实例八：repeat语句
$sql = " 
create procedure myproce8()
begin
declare i int default 0;
declare j int default 0;
repeat
set j=j+i;
set i=i+1;
until j>=10
end repeat;
select j;
end; 
";
mysql_query($sql);//创建一个myproce8的存储过程
$sql = "call test.myproce8();";
mysql_query($sql);//调用myproce8的存储过程,在cmd下面看效果
 * ======================================
实例九：loop语句
$sql = "
create procedure myproce9()
begin
declare i int default 0;
declare s int default 0;
loop_label:loop
set s=s+i;
set i=i+1;
if i>=5 then
leave loop_label;
end if;
end loop;
select s;
end; 
";
mysql_query($sql);//创建一个myproce9的存储过程
$sql = "call test.myproce9();";
mysql_query($sql);//调用myproce9的存储过程,在cmd下面看效果
 * ======================================
实例十：删除存储过程
mysql_query("drop procedure if exists myproce");//删除test的存储过程
实例十：存储过程中的游标
总结中。
来自: http://hi.baidu.com/tj%5F110/blog/item/8acf2b55c1420f54d0090663.html
*/