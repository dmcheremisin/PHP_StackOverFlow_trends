# StackOverFlow trends

This is a simple xml php parser for trends in programming languages.
StackOverFlow.com has page http://careers.stackoverflow.com/.
There are companies all around the world publish their vacancies.
You can get all data in rss format.
For example, this is what you get for request "java":
http://careers.stackoverflow.com/jobs/feed?searchTerm=java

All information after parsing will be stored in an array.
You can add as much destinations, as you want.
$url = "http://careers.stackoverflow.com/jobs/feed?";
$USA = $url."location=USA";
$UK = $url."location=UK";

$USA - url about USA jobs
$UK - url about the UK jobs

Parsing:
$data->getdata($USA);//getting data from USA
$data->getdata($UK);//getting data from UK

Showing all downloaded information
$data->showdata();//sorting data by descent order and showing in table
