// Get messages
let admin = false
console.log(window.location.href)
if (window.location.href.indexOf('./index.php')){
    admin = true;
}

window.addEventListener('load', getMessages)
document.getElementById("namesBtn").addEventListener('click', printNames)
document.getElementById("messagesBtn").addEventListener('click', printMessages)

let data = null

function getMessages() {
    const ajax = new XMLHttpRequest()
    ajax.onload = function () {
        data = JSON.parse(this.responseText)
        console.log(data)
        // const msgDiv = document.getElementById("messageDiv")
        // data.forEach(message => {

        //     const newMessage = document.createElement("p")
        //     const messageText = document.createTextNode(message.messag)
        //     newMessage.appendChild(messageText)
        //     msgDiv.appendChild(newMessage)
        // })
    }
    ajax.open("GET", "")
    ajax.send()
}

function printMessages() {
    const messageDiv = document.getElementById("messageDiv")
    messageDiv.innerHTML = ""
    data.forEach(viesti => {
        const div = document.createElement("div")
        div.classList.add("sender")
        
        const p = document.createElement("p")
        const pText = document.createTextNode(`Sent by ${viesti.sender} at ${viesti.thedate}`)
        p.appendChild(pText)
        
        const msgTextDiv = document.createElement("div")
        msgTextDiv.classList.add("message")
        msgTextDivText = document.createTextNode(viesti.messag)
        msgTextDiv.appendChild(msgTextDivText)

        div.appendChild(p)
        div.appendChild(msgTextDiv)

        if (typeof admin !== 'undefined' && admin == true) {
            const deleteBtn = document.createElement("button")
            deleteBtnText = document.createTextNode("Delete")
            deleteBtn.appendChild(deleteBtnText);
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