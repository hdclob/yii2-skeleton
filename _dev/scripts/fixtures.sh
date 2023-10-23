#!/bin/bash

SCRIPTDIR="$(dirname "$0")"

echo -e yes | php $SCRIPTDIR/../../yii fixture/load "*" --namespace='common\fixtures\user' && \

echo 'Fixtures finished!'
