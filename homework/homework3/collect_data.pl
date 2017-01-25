#! /usr/bin/perl -w

use CGI ":standard";

sub error {
    print "Error file could not be opened in collect_data.pl <br/>";
    print end_html();
    exit(1);
}

# get data
my($name, $age, $gender, $e_mail) = (param("name"), param("age"), param("gender"),param("e_mail"));

$LOCK = 2;
$UNLOCK = 8;


print header();
print start_html("Thank you");

# store the data in file
open(DATA, ">>/home/2016/y2016g166/apache/htdocs/homework/homework3/user_data.dat") or error();
flock(DATA, $LOCK);

print DATA "name=$name, age=$age, gender=$gender, e-mail=$e_mail\n";

flock(DATA, $UNLOCK);
close(DATA);

print "Thanks for participatiing in our survey <br/>\n";
print end_html();
