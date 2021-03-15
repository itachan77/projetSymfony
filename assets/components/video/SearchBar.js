import React, {Component} from 'react';


class SearchBar extends Component {

    state = {
        term: ''
    }

    onChange = e => {
        this.setState({term: e.target.value})
    }

    onSubmit = e => {
        e.preventDefault();
        //A compléter plus tard

        //on appelle 
        this.props.onFormSubmit(this.state.term);
    }

    render() {
        return (
            <div className="card mb-3">
                <div className="card-body">
                    <form onSubmit={this.onSubmit}>
                        <div>
                            <div className="form-group">
                                
                                <label htmlFor="nom">
                                    Rechercher une vidéo
                                </label>
                                
                                <div className="row pr-5">

                                    <i className="col-1 fas fa-search mt-3"></i>
                                    <input type="text"
                                        className="col-11 form-control form-control-lg"
                                        value={this.state.term}
                                        onChange={this.onChange}
                                    />

                                </div>
                            </div>
                        </div>
                    </form>
                </div>

            </div>
        )
    }
}

export default SearchBar;