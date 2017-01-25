#! /usr/bin/perl -w

use CGI ":standard";

sub error {
    print "Error file could not be opened in collect_data.pl <br/>";
    print end_html();
    exit(1);
}

# get data
$forminput = $ENV{ QUERY_STRING };
@idstr_delete = split("&", $forminput);

$LOCK = 2;
$UNLOCK = 8;


print header();
print start_html("Delete Result");

# get index of the items to delete
@id_delete = ();
foreach $str (@idstr_delete){
	$id = substr($str, -1, 1);
	push(@id_delete, $id);
}

# read the data
@items = ();
open(DATA, "</home/2016/y2016g166/apache/htdocs/homework/homework3/user_data.dat") or error();
flock(DATA, $LOCK);
while(<DATA>){
	push(@items, $_);
}
flock(DATA, $UNLOCK);
close(DATA);

# store the new data
open(DATA, ">/home/2016/y2016g166/apache/htdocs/homework/homework3/user_data.dat") or error();
flock(DATA, $LOCK);
$len = @items;
for($i = 0; $i < $len; $i = $i + 1){
	$flag = grep /$i/ ,@id_delete;
	if($flag == 0){
		print DATA "$items[i]";
	}
}
flock(DATA, $UNLOCK);
close(DATA);

print "The items you selected have been deleted!<br>";
print "Now the remains are listed below:<br><br>";

# print data
open(DATA, "</home/2016/y2016g166/apache/htdocs/homework/homework3/user_data.dat") or error();
flock(DATA, $LOCK);
while(<DATA>){
	print "$_<br><br>";
}
flock(DATA, $UNLOCK);
close(DATA);

print end_html();
