import React, { Component } from 'react'
import ReactDOM from 'react-dom'

export default class AllCandidates extends Component {
    constructor(props) {
        super(props)

        this.state = {
            candidates: null,
        }
    }

    componentDidMount() {
        let url = '/api/candidates'

        fetch(url, {
            headers: {
                Accept: 'application/json',
            },
            credentials: 'same-origin',
        })
        .then((response) => {
            if(!response.ok) throw Error([response.status, response.statusText].join(' '))

            return response.json()
        })
        .then((body) => {
            this.setState({
                candidates: body.data,
            })
        })
        .catch((error) => alert(error))
    }

    render() {
        const { candidates } = this.state

        let content
        {console.log(candidates)}
        if(!candidates) {
            content = (
                <p>Loading data...</p>
            )
        }
        else if(candidates.length == 0) {
            content = (
                <p>No candidates in record</p>
            )
        }
        else {
            let items = candidates.map((can) =>
                <tr key={ can.id }>
                    <td>{ can.name }</td>
                    <td>{ can.party.name }</td>
                </tr>
            )

            content = (
                <div className="table-responsive">
                    <table className="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>Candidate Name</th>
                                <th>Party Name</th>
                            </tr>
                        </thead>
                        <tbody>
                            { items }
                        </tbody>
                    </table>
                </div>
            )
        }

        return (
            <div className="content-wrapper">
                { content }
            </div>
        )
    }
}

(() => {
    let element = document.getElementById('content-candidates')

    if(element) {
        ReactDOM.render(<AllCandidates />, element)
    }
})()