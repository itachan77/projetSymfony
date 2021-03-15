import React from 'react';
import './List';



const Header = (props) => (
    <table border="3" width="50%" align="center" cellPadding="0" cellspacing="0">
        <tr align="center">
            <td>YOU HAVE {props.total} TODO</td>
        </tr>
    </table>
)

export default Header;