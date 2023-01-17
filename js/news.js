function upcoming(){
    var upcomingMatches = document.getElementById("upcoming")
    var pastResMatches = document.getElementById("pastRes")
    var upcomingBtn = document.getElementById("upcomingBtn")
    var pasResBtn = document.getElementById("pasResBtn")

    upcomingMatches.style.display = 'block';
    pastResMatches.style.display = 'none';
    upcomingBtn.style.borderBottom = '3px solid red'
    pasResBtn.style.borderBottom = '1px solid red'
}
function pastRes(){
    var upcomingMatches = document.getElementById("upcoming")
    var pastResMatches = document.getElementById("pastRes")
    var upcomingBtn = document.getElementById("upcomingBtn")
    var pasResBtn = document.getElementById("pasResBtn")

    upcomingMatches.style.display = 'none';
    pastResMatches.style.display = 'block';
    upcomingBtn.style.borderBottom = '1px solid red'
    pasResBtn.style.borderBottom = '3px solid red'
}