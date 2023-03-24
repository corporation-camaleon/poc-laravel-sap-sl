<div class="card">
    <div class="card-body">
        <form>
            <div class="form-group mb-3">
                <label for="DocEntry">DocEntry:</label>
                <input type="text" class="form-control @error('DocEntry') is-invalid @enderror" id="DocEntry" placeholder="Enter DocEntry" wire:model="DocEntry">
                @error('DocEntry')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group mb-3">
                <label for="DocNum">DocNum:</label>
                <input type="text" class="form-control @error('DocNum') is-invalid @enderror" id="DocNum" placeholder="Enter DocNum" wire:model="DocNum">
                @error('DocNum')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group mb-3">
                <label for="CardCode">CardCode:</label>
                <input type="text" class="form-control @error('CardCode') is-invalid @enderror" id="CardCode" placeholder="Enter CardCode" wire:model="CardCode">
                @error('CardCode')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group mb-3">
                <label for="CardName">CardName:</label>
                <input type="text" class="form-control @error('CardName') is-invalid @enderror" id="CardName" placeholder="Enter CardName" wire:model="CardName">
                @error('CardName')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="d-grid gap-2">
                <button wire:click.prevent="updateOrder()" class="btn btn-success btn-block">Update</button>
                <button wire:click.prevent="cancelOrder()" class="btn btn-secondary btn-block">Cancel</button>
            </div>
        </form>
    </div>
</div>
