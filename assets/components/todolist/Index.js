import React from 'react';
import Tache from './perso/tache.js'
import {useState, useEffect} from 'react';
import Ajouter from './perso/ajouter.js'


const adresse2 = "http://localhost:5000/eleve/";
const adresse = "http://127.0.0.1:8000/data/";

const Index = () => {
//super raccourci : rafc 



    //2
    const [monJson, setmonJson]=useState([]);

    //3
    useEffect(()=> {
            //je récupère ma réponse asynchrone
            const getMonJson = async() => {
                const dataFromServer = await fetchMonJson();
                
                //Mise à jour du State
                setmonJson(dataFromServer)
            }
        getMonJson()
        }, [])
        //Nous mettons un array vide pour que React ne refasse un fetch
        // que si le render a changé sur la page

        //1 Méthode permettant de récupérer les tâches sur le serveur
        const fetchMonJson = async() => {
            const res = await fetch(adresse)
            const data = await res.json()
            console.log(data)
            return data
        }

    //4 Supprimer uen tâche sur le serveur
    const maSupp = async (id) => {
        await fetch(adresse + `${id}`, {
            method:"DELETE"
        })
        setmonJson(
            monJson.filter(
                (toto) => toto.id !== id
            )
        )
    }

    const monAdd = async (tabloJsonexistant) => {
        
        //Ajout d'une tâche sur le serveur
        
        const res = await fetch(adresse, {
            method:"POST",
            headers:{
                'Content-type' : 'application/json',
                
            }, 

            
            body: JSON.stringify(tabloJsonexistant)
        })
            const data = await res.json()
            console.log(data);

        //Je modifie le state avec la liste actuelle plus la tâche ajoutée
        setmonJson(
            [...monJson, data])
    }

    /*

    const plusi = (toto) => {
        return(
            <Tache tache={toto.tache} id={toto.id}/>
        )
    }

    const maMod = (id) => {
        setmonJson(
            monJson.filter(
                (toto)=>(toto.id!=id)
            )
        )
    }

    const changeBool = (id) => {
        setmonJson(
            monJson.map(
                (toto)=>
                (toto.id===id ? {...toto,coche:!toto.coche}:toto)
            )
        )
    }

    const monAdd2 = (rtache) => {
        const id = Math.floor(Math.random() * 100000) + 4
        const newTache = {id,...rtache}
        setmonJson(
            [...monJson, newTache]
        )
    }

    const monAjout = (e) => {
        e.preventDefault;
        let plus = e.target.value;
        setmonJson(
            monJson.filter((toto)=>([...toto,plus]))
        )
    }
*/
    

return(

    <div>
        <div style={{textAlign:"center"}} className="carre">

            <div>
                <Ajouter surMonadd={monAdd}/>
            </div>


            {monJson.length>0 ?  <div>
                    {
                        monJson.map((toto, key)=>(
                            <>
                            <div key={toto.id}><Tache ide={toto.id} toto={toto} maSupp={maSupp} /></div>
                            </>
                        ))
                    }
                                </div>
            : "tableau vide"}

        </div>

    </div>
)

}

export default Index