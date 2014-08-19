<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Search-Bootstrap-Icons</title>
	<link rel='stylesheet' href='bootstrap.css' />
	<style>
	</style>
</head>
<body>
<?php
$fields=array('submit'=>'search', 'item'=>'item');
if(isset($_GET[$fields['submit']]))
{
	$item=trim($_GET['item']);
}
?>
<form class="form-search" action='' method='get'>
    <input type="text" class="input-medium search-query" name="<?php echo $fields['item']; ?>" />
    <button type="submit" class="btn" name="<?php echo $fields['submit']; ?>">Search</button>
</form>
<hr/>
<?php
$content=file('data.txt');
$content=preg_grep('/.(icon-.+) /', $content);
$content=array_values($content);
natsort($content);
$content=array_values($content);
echo '<table class="table table-striped table-hover"><tr>';
$found=false;
foreach($content as $key=>$value){
	$value=trim(trim(trim($value),'.{'));
	if($key%8==0 && $key!=0)echo '</tr><tr>'."\n";
	if(isset($item) && stripos($value, $item)!==false)
	{
		echo '<td class="text-error"><i class="'.$value.'"></i> '.$value.'<span class="badge badge-import">It\' Me</span></td>';
		$found=true;
	}
	else
	{
		echo '<td><i class="'.$value.'"></i> '.$value.'</td>';	
	}
}
echo '</tr></table>';
if(isset($item) && $found===false)
{
	echo '<script type="text/javascript">alert("not found");</script>';
}
?>
</body>
</html>