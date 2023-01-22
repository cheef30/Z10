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

function popuniBuduceMeceve() {
    let parametri = {
        objekat: 'mecevi',
        str: 1,
        velStr: 2,
        sortPo: "datum, vreme",
        tipMeca: 1
    }
    get(parametri).then((data) => {
        let buduciMeceviDiv = document.getElementById('upcoming');

        buduciMeceviDiv.innerHTML = '';

        data.res.forEach(el => {
            console.log(el);
            console.log(el.mec.timoviRezultati[0].tim.logo);

            buduciMeceviDiv.innerHTML += matchInfoHTML(el)
        });
    })

    parametri.sortPo = "datum desc, vreme desc"
    parametri.tipMeca = 2
    get(parametri).then((data) => {
        let prosliMeceviDiv = document.getElementById('pastRes')

        prosliMeceviDiv.innerHTML = ''

        data.res.forEach(el => {
            prosliMeceviDiv.innerHTML += matchInfoHTML(el)
        })
    })
}

function matchInfoHTML(el) {
    let datum = (new Date(Date.parse(el.mec.datum)).toLocaleDateString('default', {
        month: "short",
        day: "2-digit",
        year: "numeric"
    }));
    let vreme = el.mec.vreme

    return `
    <div class="matchInfo">
        <div class="left">
            <p><span class="mini-title">${el.nazivIgre}</span><br><span class="not-bold">${el.nazivTakmicenja}</span></p>
        </div>
        <div class="right">
            <p>${vreme.substring(0, vreme.length - 3)}H<br><span class="not-bold">${datum}</span></p>
        </div>
    </div>
    <div class="slicice_dugme">
        <div class="slicice">
            <img class="up" src="../images/logos/${el.mec.timoviRezultati[0].tim.logo}" alt="">
            <span id="v">V</span>
            <span id="s">S</span>
            <img class="down" src="../images/logos/${el.mec.timoviRezultati[1].tim.logo}" alt="">
        </div>
        <div class="dugme">
            <div>
                <a href="#">
                    <p>
                        <span class="bg"></span>
                        <span class="base"></span>
                        <span class="text">Watch</span>
                    </p>
                </a>
            </div>
        </div>
    </div>
    <br>
`;
}
