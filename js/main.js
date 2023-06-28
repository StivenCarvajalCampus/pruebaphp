let campertable = document.getElementById("campertable");
const campers = async()=>{
    try{
        const res = await fetch (`http://localhost/proyectos/pruebaphp/uploads/campus/campers`)
        const data = await res.json()
        for(const key in data.result){
            console.log();
        }
         plantilla = `
        <table class="table table-dark">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">IdCamper</th>
      <th scope="col">nombreCamper</th>
      <th scope="col">apellidoCamper</th>
      <th scope="col">fechaNac</th>
      <th scope="col">IdReg</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">1</th>
      <td>${data.result[key].idCamper}</td>
      <td>${data.teams.Match[0].League}</td>
      <td>${data.teams.Match[0].Stadium}</td>
      <td>${data.teams.Match[0].Round}</td>
      <td>${data.teams.Match[0].HomeTeam}</td>
      <td>${data.teams.Match[0].AwayTeam}</td>
    </tr>
    <tr>
    </tr>
  </tbody>
</table>

        `;
        console.log(data[key]);
        
        campertable.innerHtml=plantilla;
        return "ok";
        }catch(e){
            return "error"+e;
        }
        }
        campertable();