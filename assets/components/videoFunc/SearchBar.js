import React, {useState} from 'react';

const SearchBar = (props) =>  {
    
    const [term, setTerm] = useState('');
    

    const onChange = e => {
        setTerm(e.target.value);
    }

    const onSubmit = e => {
        e.preventDefault();
        //A compléter plus tard

        //on appelle 
        props.onFormSubmit(term);
    }

        return (
            <div className="card mb-3">
                <div className="card-body">
                    <form onSubmit={onSubmit}>
                        <div>
                            <div className="form-group">
                                
                                <label htmlFor="nom">
                                    Rechercher une vidéo
                                    
                                </label>
                                
                                <div className="row pr-5">

                                    <i className="col-1 fas fa-search mt-3"></i>
                                    <input type="text"
                                        className="col-11 form-control form-control-lg"
                                        value={term}
                                        onChange={onChange}
                                    />

                                </div>
                            </div>
                        </div>
                    </form>
                </div>

            </div>
        )
    
}

export default SearchBar;