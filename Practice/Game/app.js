/*
GAME RULES:

- The game has 2 players, playing in rounds
- In each turn, a player rolls a dice as many times as he whishes. Each result get added to his ROUND score
- BUT, if the player rolls a 1, all his ROUND score gets lost. After that, it's the next player's turn
- The player can choose to 'Hold', which means that his ROUND score gets added to his GLBAL score. After that, it's the next player's turn
- The first player to reach 100 points on GLOBAL score wins the game

*/
//GLOBAL VARIABLES 
let randomNum, randomNum1, randomNum2, dice1, dice2, activePlayer, scores, isGamePlaying;
let newGameBtn, rollBtn, holdBtn, setValueBtn;
let currentScore0, currentScore1, currentScoreSum, globalScore0, globalScore1;
let player0Panel, player1Panel, name0, name1; 
let inputValue, thresholdValue, tValue;

inputValue = document.querySelector(".input-value");
name0 = document.querySelector('#name-0');
name1 = document.querySelector('#name-1');
newGameBtn = document.querySelector('.btn-new');
rollBtn = document.querySelector('.btn-roll');
holdBtn = document.querySelector('.btn-hold');
setValueBtn = document.querySelector('.btn-set-value');
dice1 = document.querySelector('.die1');
dice2 = document.querySelector('.die2');
thresholdValue = document.querySelector('.thresh-score');
currentScore0 = document.getElementById('current-0');
currentScore1 = document.getElementById('current-1');
globalScore0 = document.getElementById('score-0');
globalScore1 = document.getElementById('score-1');
player0Panel = document.querySelector('.player-0-panel');
player1Panel = document.querySelector('.player-1-panel');

/*-------------------------------------FUNCTIONS----------------------------------------------------*/

const initialise = (threshValue=100)=>{
    dice1.style.display = 'none';
    dice2.style.display = 'none';
    isGamePlaying = true;
    tValue = threshValue;
    thresholdValue.textContent = tValue;
    scores = [0,0];
    activePlayer = 0;
    currentScoreSum = 0;
    currentScore0.textContent = 0;
    currentScore1.textContent = 0;
    globalScore0.textContent = 0;
    globalScore1.textContent = 0;
    player0Panel.classList.remove('active');
    player1Panel.classList.remove('active');
    player0Panel.classList.add('active');
    player0Panel.classList.remove('winner');
    player1Panel.classList.remove('winner');
    name0.textContent = 'Player 1';
    name1.textContent = 'Player 2';
}

const rollDice = ()=>{
    randomNum1 = Math.floor(Math.random()*6)+1;
    randomNum2 = Math.floor(Math.random()*6)+1;
    randomNum = randomNum1 + randomNum2;
    dice1.style.display = "block";
    dice2.style.display = "block";
    dice1.src = "die"+randomNum1+".png";
    dice2.src = "die"+randomNum2+".png";
}

const changeRoles = ()=>{
    if(activePlayer === 1){
        activePlayer = 0;
        player1Panel.classList.toggle('active');
        player0Panel.classList.toggle('active');
        currentScore1.textContent = 0;
    }
    else{
        activePlayer = 1;
        player0Panel.classList.toggle('active');
        player1Panel.classList.toggle('active');
        currentScore0.textContent = 0;
    }
    inputValue.classList.toggle('active');
    dice1.style.display = 'none';
    dice2.style.display = 'none';
    
}

/*---------------------------------------------Program Flow Starts here----------------------------*/
initialise();

setValueBtn.addEventListener('click', ()=>{
    if(inputValue.value!==null){
        initialise(inputValue.value);
        inputValue.value = '';
    }
})

rollBtn.addEventListener('click', ()=>{
    if(isGamePlaying){
        rollDice();
        console.log(randomNum1, randomNum2);
        if(randomNum1 === 1 || randomNum2 === 1){
            changeRoles();
            currentScoreSum = 0; 
        }
        else {
            currentScoreSum += randomNum;
            activePlayer ? currentScore1.textContent = currentScoreSum : currentScore0.textContent = currentScoreSum;
        }
    }
});

holdBtn.addEventListener('click', ()=>{
    if(isGamePlaying){
        scores[activePlayer] += currentScoreSum;
        if(activePlayer === 1) globalScore1.textContent = scores[activePlayer];
        else globalScore0.textContent = scores[activePlayer];
        currentScoreSum = 0;

        if(scores[activePlayer] >= tValue){
            document.querySelector('.player-'+activePlayer+'-panel').classList.add("winner");
            document.getElementById('name-'+activePlayer).textContent = 'WINNER !';
            document.querySelector('.player-'+activePlayer+'-panel').classList.remove("active")
            dice1.style.display = 'none';
            dice2.style.display = 'none';
            isGamePlaying = false;
        }
        else
            changeRoles();
    }
});

newGameBtn.addEventListener('click', ()=>{
    initialise();
});




