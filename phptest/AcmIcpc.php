<?php
$handle = fopen ("php://stdin","r");
fscanf($handle,"%d %d",$n,$m);
$people = array();
$topic = array();
for($topic_i = 0; $topic_i < $n; $topic_i++){
   fscanf($handle,"%s",$people[]);
}
for($i=0; $i<$n; $i++){
    for($j=$i+1; $j<$n; $j++){
        $count = 0;
        for($k=0; $k<$m; $k++){
            if(($people[$i][$k]==1 && $people[$j][$k]==1) || ($people[$i][$k]==1 && $people[$j][$k]==0) || ($people[$i][$k]==0 && $people[$j][$k]==1)){
                $count++;
            }
        }
        $topic[]=$count;
    }
}
$team_topics = array_count_values($topic);
$max_topic= max($topic);
echo $max_topic."\n";
echo $team_topics[$max_topic];
?>