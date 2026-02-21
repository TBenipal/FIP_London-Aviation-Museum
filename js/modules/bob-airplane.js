export function bobairplane() {
    console.log("JS file loaded");

    const tabs = document.querySelectorAll(".ba-tab");
    const textContainer = document.querySelector("#ba-text");


    textContainer.appendChild(
        document.querySelector("#name").content.cloneNode(true)
    );

    tabs.forEach(tab => {
        tab.addEventListener("click", function() {
            console.log("Clicked");
            tabs.forEach(t => t.classList.remove("active"));
            // Add active to clicked tab
            this.classList.add("active");

            textContainer.innerHTML = "";
            textContainer.appendChild(
                document.querySelector(`#${tab.dataset.content}`).content.cloneNode(true)
            );
        })
    })
}