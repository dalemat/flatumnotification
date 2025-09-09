import app from 'flarum/admin/app';

app.initializers.add('cryptofxsignal-onesignal', () => {
    app.extensionData
        .for('cryptofxsignal-flarum-onesignal')
        .registerSetting({
            setting: 'cryptofx.onesignal.enabled',
            label: 'Enable Notifications',
            help: 'Turn CryptoFX OneSignal push notifications on or off',
            type: 'boolean'
        })
        .registerSetting({
            setting: 'cryptofx.onesignal.app_id',
            label: 'OneSignal App ID',
            help: 'Your OneSignal App ID from the dashboard (Keys & IDs section)',
            type: 'text',
            placeholder: 'xxxxxxxx-xxxx-xxxx-xxxx-xxxxxxxxxxxx'
        })
        .registerSetting({
            setting: 'cryptofx.onesignal.api_key', 
            label: 'OneSignal REST API Key',
            help: 'Your OneSignal REST API Key (keep this secret!)',
            type: 'password',
            placeholder: 'Your OneSignal REST API Key'
        })
        .registerSetting(() => {
            return (
                <div className="Form-group">
                    <div className="helpText">
                        <strong>🚀 CryptoFX OneSignal Setup:</strong><br/>
                        1. Create account at <a href="https://onesignal.com" target="_blank">OneSignal.com</a><br/>
                        2. Add new app → Web Push → Get your App ID & API Key<br/>
                        3. Paste credentials above and save<br/>
                        4. Test by posting a new discussion!<br/><br/>
                        <em>💡 Notifications include special emojis for crypto (₿), forex (💱), and general trading (📊) signals!</em>
                    </div>
                </div>
            );
        });
});
