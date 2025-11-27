<div class="mb-3">
    <label>Code</label>
    <input type="text" name="code" class="form-control"
           value="{{ old('code', $coupon->code ?? '') }}">
</div>

<div class="mb-3">
    <label>Email (optional)</label>
    <input type="email" name="email" class="form-control"
           value="{{ old('email', $coupon->email ?? '') }}">
</div>

<div class="mb-3">
    <label>Discount Type</label>
    <select name="type" class="form-control">
        <option value="percent" {{ old('type', $coupon->type ?? '') === 'percent' ? 'selected' : '' }}>Percent</option>
        <option value="fixed" {{ old('type', $coupon->type ?? '') === 'fixed' ? 'selected' : '' }}>Fixed</option>
    </select>
</div>

<div class="mb-3">
    <label>Value</label>
    <input type="number" step="0.01" name="value" class="form-control"
           value="{{ old('value', $coupon->value ?? '') }}">
</div>

<div class="mb-3">
    <label>Usage Limit</label>
    <input type="number" name="usage_limit" class="form-control"
           value="{{ old('usage_limit', $coupon->usage_limit ?? '') }}">
</div>

<div class="mb-3">
    <label>Minimum Order Amount</label>
    <input type="number" step="0.01" name="min_order_amount" class="form-control"
           value="{{ old('min_order_amount', $coupon->min_order_amount ?? '') }}">
</div>

<div class="row">
    <div class="col-md-6">
        <label>Starts At</label>
        <input type="datetime-local" name="starts_at" class="form-control"
               value="{{ old('starts_at', isset($coupon->starts_at) ? $coupon->starts_at->format('Y-m-d\TH:i') : '') }}">
    </div>

    <div class="col-md-6">
        <label>Expires At</label>
        <input type="datetime-local" name="expires_at" class="form-control"
               value="{{ old('expires_at', isset($coupon->expires_at) ? $coupon->expires_at->format('Y-m-d\TH:i') : '') }}">
    </div>
</div>

<div class="mb-3 mt-3">
    <label>Status</label>
    <select name="is_active" class="form-control">
        <option value="1" {{ old('is_active', $coupon->is_active ?? 1) == 1 ? 'selected' : '' }}>Active</option>
        <option value="0" {{ old('is_active', $coupon->is_active ?? 1) == 0 ? 'selected' : '' }}>Inactive</option>
    </select>
</div>
