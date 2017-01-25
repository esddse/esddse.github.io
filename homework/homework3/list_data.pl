#! /usr/bin/perl -w

use CGI ":standard";

sub error {
    print "Error file could not be opened in list_data.pl <br/>";
    print end_html();
    exit(1);
}

$LOCK = 2;
$UNLOCK = 8;

print header();
print start_html("Survey Data");

# store the data in file
open(DATA, "</home/2016/y2016g166/apache/htdocs/homework/homework3/user_data.dat") or error();
flock(DATA, $LOCK);

print "<form method=\"get\" action=\"/cgi-bin/delete_data.pl\">";
$index = 0;
while(<DATA>){
	print "<input type=\"checkbox\" name=\"todelete\" value=\"$index\">$_<br><br>";
	$index = $index+1;
}
print "All items you selected will be deleted.";
print "<input type=\"submit\" value=\"delete\">";
print "</form>";

flock(DATA, $UNLOCK);
close(DATA);

print end_html();


