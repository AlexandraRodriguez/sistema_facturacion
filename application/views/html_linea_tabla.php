
												<td>
													<input type="text" class="form-control" readonly/>
													<!-- Trigger the modal with a button -->
                        </td>
												<td>
                          <button type="button" class="btn btn-info"
																	data-toggle="modal" data-target="#myModal"
																	onclick="get_products(<?php echo $_POST['id_linea_tabla']?>)">Buscar
												</td>
                        <td width="45"><input  class="form-control"="6"/></td>
                        <td><input type="number" class="form-control" readonly/></td>
                        <td>
                          <select >
                            <option >iva</option>
                            <option >13%</option>
                            <option >14%</option>
                          </select>
                        </td>
                        <td>0</td>
                        <td class="eliminar"><button  id="eliminarfila" type="button" class="btn btn-danger">x</button></td>
