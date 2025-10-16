// script.js
const chatForm = document.getElementById("chat-form");
const userInput = document.getElementById("user-input");
const chatBox = document.getElementById("chat-box");

chatForm.addEventListener("submit", function (e) {
  e.preventDefault();
  const message = userInput.value.trim();
  if (message === "") return;

  // Přidání zprávy uživatele
  addMessage("user", message);

  // Simulovaná odpověď bota
  setTimeout(() => {
    const botReply = generateBotReply(message);
    addMessage("bot", botReply);
  }, 500);

  userInput.value = "";
});

function addMessage(sender, text) {
  const msgDiv = document.createElement("div");
  msgDiv.classList.add("message", sender);
  msgDiv.textContent = text;
  chatBox.appendChild(msgDiv);
  chatBox.scrollTop = chatBox.scrollHeight;
}

function generateBotReply(userMessage) {
  // Jednoduchá simulace odpovědi
  if (userMessage.toLowerCase().includes("ahoj")) {
    return "Ahoj! Jak se máš?";
  } else if (userMessage.toLowerCase().includes("jak se máš")) {
    return "Jsem jen kód, ale děkuji za optání!";
  } else {
    return "Zajímavé! Můžeš mi říct víc?";
  }
}
