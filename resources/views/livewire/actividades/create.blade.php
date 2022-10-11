<!-- Modal -->
<div wire:ignore.self class="modal fade" id="createDataModal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="createDataModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createDataModalLabel">Create New Actividade</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true close-btn">×</span>
                </button>
            </div>
           <div class="modal-body">
				<form>
            <div class="form-group">
                <label for="Descripcion"></label>
                <input wire:model="Descripcion" type="text" class="form-control" id="Descripcion" placeholder="Descripcion">@error('Descripcion') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label for="FechaActividad"></label>
                <input wire:model="FechaActividad" type="date" class="form-control" id="FechaActividad" placeholder="Fechaactividad">@error('FechaActividad') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label for="area"></label>
                <select wire:model="area" type="text" class="form-control" id="area" placeholder="Area">
                
                     <option value="selecionar">--seleccionar----</option>
                     <option value="TI" selected>sistemas</option>
                     <option value="general">general</option>
                     <option value="Administrativa">Administrativa</option>
                     </select>
                
                
                @error('area') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label for="idEmpleado"></label>
                <input wire:model="idEmpleado" type="number" class="form-control" id="idEmpleado" placeholder="Idempleado">@error('idEmpleado') <span class="error text-danger">{{ $message }}</span> @enderror
            </div>

                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary close-btn" data-dismiss="modal">Close</button>
                <button type="button" wire:click.prevent="store()" class="btn btn-primary close-modal">Save</button>
            </div>
        </div>
    </div>
</div>
