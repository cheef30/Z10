let strimoviContainer = document.querySelector('.dzigubigule')
const clientID = 'dtkrl49snpz3gpbuwkcobxhos0e9f7'
const secret = '3b4l62mcswyz5hhub5pg1uy5cs5nuo'
function strimovi(token){
  let url = `https://api.twitch.tv/helix/streams?user_login=${strimeri[0]}`
  for(let i = 1 ; i<strimeri.length ; i++){
    url += `&user_login=${strimeri[i]}`
  }
  let parametri = {
    method:'GET',
    headers:{
      'content-type':'application/json;',
      'Authorization':'Bearer ' + token,
      'Client-id': clientID
    }
  }
  fetch(url,parametri)
  .then(data=>{return data.json()})
  .then(res=>{
   strimoviContainer.innerHTML = '';
    res.data.forEach(element => {
      fetch(`https://api.twitch.tv/helix/users?id=${element.user_id}`, parametri).then(data=>{return data.json()}).then(user=>{
        strimoviContainer.innerHTML+=strimhtml(user.data[0].profile_image_url, element.user_name, element.viewer_count)

      }).catch(error=>console.log(error))
  
    });
  })
  .catch(error=>console.log(error))
}
const strimeri = ['z10hebihime','xjackiethedevilx','zerotenacity', 'iamninna' , 'komedyja', 'sto1etv','asaiika','z10_okami', 'sef30', 'zerotenacity2', 'komedyja', 'raqacsgo', 'l2plelouch', 'traviscwat', 'ben1hime', 'z10razor', 'nowycolor', 'ryuzaki1v9', 'slowwwq', 'kr_noah7', 'tkdgus6307', 'xitsha', 'jasvlr', 'kenob1g']
function getToken(){
  let url = `https://id.twitch.tv/oauth2/token?client_id=${clientID}&client_secret=${secret}&grant_type=client_credentials`
  let parametri = {
    method:'POST',
    headers:{
      'content-type':'application/json;'
    }
  }
  fetch(url,parametri)
  .then(data=>{return data.json()})
  .then(res=>{
    strimovi(res.access_token)
  })
  .catch(error=>console.log(error))
}

  function strimhtml(slikaP, imestrimera, brojgledalaca){
  return `<a href="https://www.twitch.tv/${imestrimera}" target="_blank"><div class='streams'> <table>
  <tr>
  <td class="levo"><img src='${slikaP}'></td>
  <td class="desno" colspan='2'>
    <table>
      <tr> 
        <td class="gore"><p>${imestrimera}</p></td>
      </tr>
      <tr>
        <td class="dole"><p> <p>Live now</p> : ${brojgledalaca} viewers</p></td>
      </tr>
    </table>
  </td>
  </tr>
</table>
</div>
</a>`
}


getToken()