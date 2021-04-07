const words = [
    'Find your favourite recipe with us',
    'Share with your favourite recipe.',
    "Don't miss new posts with recipes!"
]

let wordTurn = 0
let charTurn = 0

let output = document.querySelector('#outputText')

printWord()

function printWord() {
    if (words[wordTurn].length > charTurn) {

        output.innerHTML += words[wordTurn].charAt(charTurn)
        charTurn += 1

        setTimeout(printWord, 100)
    } else {
        setTimeout(deleteWord, 50)
    }
}


function deleteWord() {
    if (charTurn >= 0) {

        let outText = words[wordTurn].substring(0, charTurn)
        charTurn -= 1
        output.innerHTML = outText

        setTimeout(deleteWord, 50)
    } else {
        wordTurn += 1

        if (wordTurn >= words.length) {
            wordTurn = 0
        }
        setTimeout(printWord, 100)
    }
}


$(document).ready(function() {
    $('.about-site').viewportChecker({
        callbackFunction: function() {
            $('.about-site').addClass('active')
        },
    });
    $('.about-recipe').viewportChecker({
        callbackFunction: function() {
            $('.about-recipe').addClass('active')
        },
    });
    $('.about-us').viewportChecker({
        callbackFunction: function() {
            $('.about-us').addClass('active')
        },
    });
});