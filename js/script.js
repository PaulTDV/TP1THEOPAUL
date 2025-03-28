function vote(mode) {
    fetch("include/vote.php", {
        method: "POST",
        headers: { "Content-Type": "application/x-www-form-urlencoded" },
        body: "mode=" + mode
    })
    .then(response => response.json())
    .then(data => {
        // Mettre à jour les votes affichés
        document.querySelectorAll(".vote-btn").forEach(btn => {
            let modeText = btn.innerText.split(" (")[0];
            btn.innerText = modeText + " (" + (data[modeText] || 0) + " votes)";
        });
    });
}
