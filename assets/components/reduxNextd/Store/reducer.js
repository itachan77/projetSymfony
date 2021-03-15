const INITIAL_STATE = {
    compteur : 300
}

const reducer = (state = INITIAL_STATE, action) => {
        switch(action.type) {
            case 'INCR':
                return {
                    //récupère tout le state
                    ...state,
                    //et spécifie le compteur
                    compteur:state.compteur + 1
                }
            case 'DECR':
                return {
                    //récupère tout le state
                    ...state,
                    //et spécifie le compteur
                    compteur:state.compteur - 1
                }
            default:return state;
        }
        
}

export default reducer;