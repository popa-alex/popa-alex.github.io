import React from 'react';
import ProductTile from '../product/ProductTile';

class ProductList extends React.Component {
    state =  {}

    componentDidMount() {
        fetch('http://localhost/react-watch-shop/src/get_homepage_products.php')
        .then(response => response.json())
        .then(result => {
            const watches = Object.keys(result).map(index =>                 
                <div key={index} className="product-tile">                    
                        <ProductTile 
                            key={index}
                            product={result[index]}
                        />
                </div>
            )
            return this.setState({watches: watches});
        });
    }

    render() {
        return(
            <div className="product-grid">{this.state.watches}</div>
        )
    }
}

export default ProductList;