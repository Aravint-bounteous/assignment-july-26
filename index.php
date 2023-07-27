<?php
function movePlayerAntiClockwise(&$position, $diceValue) {
    $positions = array(5,1, 2, 3, 6, 9, 8, 7, 4);
    $currentPositionIndex = array_search($position, $positions);
    $newPositionIndex = ($currentPositionIndex - $diceValue + 8) % 8;
      if(($position==2&&$diceValue>2)||($position==1&&$diceValue>1)){

}else{
    $position = $positions[$newPositionIndex];
}
}

function movePlayerAntiClockwise2(&$position2, $diceValue) {
    $positions = array(5,1, 2, 3, 6, 9, 8, 7, 4);
    $currentPositionIndex = array_search($position2, $positions);
    $newPositionIndex = ($currentPositionIndex - $diceValue + 8) % 8;
      if(($position2==2&&$diceValue>2)||($position2==1&&$diceValue>1)){

}else{
    $position2 = $positions[$newPositionIndex];
}
}

 

function rollDice() {
    return rand(1, 3);

}

 

function displayPositions($positions) {
    echo "Positions:\n";
    for ($row = 0; $row < 3; $row++) {
        for ($col = 0; $col < 3; $col++) {
          if($row==1 && $col ==0){           
            echo "\tAB\t";
          }elseif($row==1 && $col ==1){
             echo "\tHOME\t";
          }elseif($row==1 && $col ==2){
            echo "SAFE\t";
          }else{
            echo "\t-\t";
          }        
        }
        echo "\n";
    }
}

 

function displayPlayerPositions($positions,&$playerPosition,&$playerPosition2,&$switchPlayers) {
    echo "Positions:\n";
    for ($row = 0; $row < 3; $row++) {
        for ($col = 0; $col < 3; $col++) {
            $index = $row * 3 + $col;
          if(($positions[$index]==$playerPosition)&&($positions[$index]!=$playerPosition2)){
            echo "\tA\t";
          }else if(($positions[$index]==$playerPosition2)&&($positions[$index]!=$playerPosition)){
            echo "\tB\t";
          }else if(($positions[$index]==$playerPosition)&&($positions[$index]==$playerPosition2)){
            if($playerPosition==6 && $playerPosition2 ==6){
                          echo "\tAB\t";
            }else{
              if($switchPlayers==true){
              $playerPosition2=4;
              echo "\tA\t";
            }else{
                $playerPosition=4;
              echo "\tB\t";
            }

            }
          }elseif($row==1 && $col ==0){
            if($playerPosition==4){
              echo "\tA\t";
            }elseif($playerPosition2==4){
              echo "\tB\t";
            }elseif($playerPosition==4 && $playerPosition2==4){
              echo "\tAB\t";
            }elseif($playerPosition==$playerPosition2){

              if($switchPlayers==true&&$playerPosition!=6){
                echo "\tB\t";
              }else{
                if($playerPosition2!=6){
                  echo "\tA\t";
                }
                else{
                   echo "\tSTART\t";
                }
              }
            }else{
              echo "\tSTART\t";
            }
          }elseif($row==1 && $col ==1){
            echo "\tHOME\t";
          }elseif($row==1 && $col ==2){
            echo "\tSAFE\t";
          }else{
            echo "\t-\t";
          }
        }
        echo "\n";
    }
}

 

$playerPosition = 4;
$playerPosition2 = 4;
echo "Welcome to the Dice Game!\n";
echo "Player starts at position - START : 4.\n";
displayPositions(range(1, 9));
$switchPlayers=false;
while (true) {
    echo "\nCurrent position of A: " . $playerPosition . "\n";
  echo "Current position of B: " . $playerPosition2 . "\n";
    echo "Rolling the dice...\n";
    $diceValue = rollDice();
    $diceValue2 = rollDice();

 

  if($switchPlayers==false){
    echo "Dice value for A: " . $diceValue . "\n";
        movePlayerAntiClockwise($playerPosition, $diceValue);
        echo "New position of A: " . $playerPosition . "\n";
    $switchPlayers=true;
  }else{
      echo "Dice value for B: " . $diceValue2 . "\n";
        movePlayerAntiClockwise2($playerPosition2, $diceValue2);
      echo "New position of B: " . $playerPosition2 . "\n";
    $switchPlayers=false;
  }

 

    displayPlayerPositions(range(1, 9),$playerPosition,$playerPosition2,$switchPlayers);

      echo "Press 'Enter' to continue or type 'exit' to quit: ";

 

    $input = trim(fgets(STDIN));
    if ($input === 'exit' || $playerPosition==5) {
        echo "Player A WON !! Thanks for playing. Goodbye!\n";
        break;
    }elseif($input === 'exit' || $playerPosition2==5){
      echo "Player B WON !! Thanks for playing. Goodbye!\n";
        break;
    }
  echo "-----------------------------------------------------\n";
}
?>
