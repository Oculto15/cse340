<?php
$json = '{
    "quiz": {
        "sport": {
            "q1": {
                "question": "Which one is a correct team name in the NBA?",
                "options": [
                    "New York Bulls",
                    "Los Angeles Kings",
                    "Gem State Warriros",
                    "Houston Rockets"
                ],
                "answer": "Houston Rockets"
            }
        },
        "maths": {
            "q1": {
                "question": "5 + 7 = ?",
                "options": [
                    "10",
                    "11",
                    "12",
                    "13"
                ],
                "answer": "12"
            },
            "q2": {
                "question": "12 - 8 = ?",
                "options": [
                    "1",
                    "2",
                    "3",
                    "4"
                ],
                "answer": "4"
            }
        }
    }
}';
$quizzer = json_decode($json,true);
print_r($quizzer);

$question1 = $quizzer['quiz']['sport']['q1'];
print $question1['question'];

foreach ($question1['options'] as $key=>$value){
    print "$key $value<br>";
} 

foreach ($quizzer['quiz']['maths'] as $value){
    print $value['question'];
    print("<br><select><option> Choose one options</option>");
    foreach($value['options'] as $key=>$options){
        print "<option value='$key'> $options</option>";
    }
    print("</select><br>");
}

?>