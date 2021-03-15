

class Essai extends React.Component {
    render() {
        return (
            
        )

    }
}

ReactDOM.render(
    <Essai/>, document.getElementById('root')
)

function Plusplus () {
    return (
        <a href="#">le lien de Chantal</a>
    )
}
ReactDOM.render(
    <Plusplus />, document.getElementById('plus')
)



const Flec = () => (
    <h1>CLAVIER</h1>
)

ReactDOM.render(
    <Flec/>, document.getElementById('fleche')
)



class Deux extends React.Component {
    render() {
        return(
            <h2 className="jaune">DEUXIEME {this.props.info} {this.props.nb} {this.props.plus} </h2>
        )
    }
    
}
ReactDOM.render(
    <Deux info="CHAMBRE A DROITE MONTER" nb={6} plus="ETAGES"  />, document.getElementById('deuxieme')
)



const Trois = ({maValeur}) => (
    <form action="">
        <input type="text" value={maValeur}/>
    </form>
)

ReactDOM.render(
    <Trois maValeur="valeur sans props" />, document.getElementById('deuxieme')
)

class Moimoi extends React.Component {
    constructor(props) {
        super(props)
        this.state = {
            nom: "Chantal"
        }
        this.MaFonction = this.MaFonction.bind(this);
    }

    MaFonction(param) {
        this.setState({
        nom: param.target.value})
    }   

    render(){
        return(
        <form action="">
        <div>
        <label className="jaune" for="moi">{this.state.nom}</label> 
        <div><input id="moi" type="text" value={this.state.nom} onChange={this.MaFonction}/></div>
        </div>
        </form>
        
        )

    }
}

ReactDOM.render(
    <Moimoi/>, document.getElementById('deuxieme')
)










let sortie = document.getElementById('deuxieme');
sortie.addEventListener('onChange',function(){
this.innerHTML="bonjour";

})



