import React from 'react';
import ProductTile from './ProductTile';
import axios from 'axios';

class CategoryLanding extends React.Component {
    state = {
        watches: []
    }    

    componentDidMount() {
        // let category = {}; 
        // category.name = this.props.match.params.categoryname;
        // let categoryJson = JSON.stringify(category);

        // console.log(JSON.stringify(category));
        
        // axios.post(`http://localhost/react-watch-shop/src/get_products.php`, {categoryJson})
        // .then(res => {
        //     const watches = res.data.json();
        //     //console.log(watches);
        //     this.setState({ watches: watches });
        //     console.log(Object.keys(this.state.watches));
        // })
        //console.log('Did Mount');

        // let category = {};        
        // category.name = this.props.match.params.categoryname;        
        // //let that = this;

        // console.log('RENDERED');
        // fetch('http://localhost/react-watch-shop/src/get_products.php', {
        //     method: 'POST',
        //     body: JSON.stringify(category)
        // })
        // .then(response => response.json())
        // .then(result => {
        //     const watches = result;
        //     this.setState({ watches: watches });
        // });
    }

    componentWillReceiveProps() {
        console.log('UPDATED');

        let category = {};        
        category.name = this.props.match.params.categoryname;        
        //let that = this;

        console.log('RENDERED');
        fetch('http://localhost/react-watch-shop/src/get_products.php', {
            method: 'POST',
            body: JSON.stringify(category)
        })
        .then(response => response.json())
        .then(result => {
            const watches = result;
            this.setState({ watches: watches });
        });
    }
    
    render() {
         

        return (
            <div className="content-wrapper product-grid">
                { Object.keys(this.state.watches).map(index => <li key={index}>{this.state.watches[index].model_name}</li>)}
            </div>
        )
    }
}

export default CategoryLanding;