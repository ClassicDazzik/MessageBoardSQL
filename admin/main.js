// Get messages
let admin = false;
console.log(window.location.href)
if (window.location.href.indexOf('/admin/') > -1){
    admin = true;
}

window.addEventListener('load', getMessages)
document.getElementById("namesBtn").addEventListener('click', printNames)
document.getElementById("messagesBtn").addEventListener('click', printMessages)
document.getElementById("messageDiv").addEventListener('click', checkMessageClick)

let data = null

function getMessages() {
    const ajax = new XMLHttpRequest()
    ajax.onload = function () {
        data = JSON.parse(this.responseText)
        console.log(data)
    }
    ajax.open("GET", "../conn/getAllMessages.php")
    ajax.send()
}

function printMessages() {
    const messageDiv = document.getElementById("messageDiv")
    messageDiv.innerHTML = ""
    data.forEach(viesti => {
        const div = document.createElement("div")
        div.classList.add("sender")
        if (viesti.hidden === "1") {
            div.style.backgroundColor = "gray"
        }
        
        const p = document.createElement("p")
        const pText = document.createTextNode(`Sent by ${viesti.sender} at ${viesti.thedate}`)
        p.appendChild(pText)
        
        const msgTextDiv = document.createElement("div")
        msgTextDiv.classList.add("message")
        msgTextDivText = document.createTextNode(viesti.messag)
        msgTextDiv.appendChild(msgTextDivText)

        div.appendChild(p)
        div.appendChild(msgTextDiv)

        if (typeof admin !== 'undefined' && admin === true) {
            const hideBtn = document.createElement("button")
            hideBtn.classList.add("hide")
            hideBtn.setAttribute("id", viesti.id)
            if (viesti.hidden == 1) {
                hideBtn.innerHTML = "Show"
            } else {
                hideBtn.innerHTML = "Hide"
            }
            div.appendChild(hideBtn)

            const deleteBtn = document.createElement("button")
            deleteBtn.classList.add("delete")
            deleteBtn.setAttribute("id", viesti.id)
            deleteBtn.innerHTML = "Delete"
            div.appendChild(deleteBtn)
        }

        messageDiv.appendChild(div)
        })
}

function printNames() {
    const msgDiv = document.getElementById("messageDiv")
    msgDiv.innerHTML = ""
    data.forEach(message => {

        const newMessage = document.createElement("p")
        const messageText = document.createTextNode(message.sender)
        newMessage.appendChild(messageText)
        msgDiv.appendChild(newMessage)
    })
}

function checkMessageClick(event){
    const ajax = new XMLHttpRequest();
    ajax.open("GET", "../conn/controlMessage.php?id=" + event.target.id + "&action=" + event.target.className);
    ajax.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    ajax.send();

    switch (event.target.className) {
        case "delete":
            event.target.parentElement.remove();
            break;
        case "hide":
            var parentElem = event.target.parentElement;
            parentElem.style.backgroundColor = parentElem.style.backgroundColor === '' ? 'gray' : '';
            event.target.innerHTML = event.target.innerHTML === "Hide" ? "Show" : "Hide";
            break;
        default:
    }
}